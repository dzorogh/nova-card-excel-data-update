<template>
  <card
    class="py-6 px-6"
    style="height: auto;"
  >
    <h1 class="mb-6 text-xl font-bold text-center">
      Обновление данных через Excel
    </h1>
    
    <div class="flex flex-row">
      <div class="flex-1 text-center flex items-center justify-center">
        <button
          type="button"
          class="btn btn-default btn-primary select-none"
          @click.prevent="downloadFile"
        >
          <span v-if="downloading">
            {{ __('Подготовка и скачивание...') }}
          </span>
  
          <span v-else>
            {{ __('Скачать текущие данные') }}
          </span>
        </button>
      </div>
      <div class="flex-1 text-center flex-col items-center justify-center">
        
        <span
          class="form-file"
        >
          <input
            ref="fileField"
            class="form-file-input select-none"
            type="file"
            id="file"
            name="name"
            @change="uploadFile( $event )"
            :disabled="uploading"
            accept="xlsx"
          />
          <label
            for="file"
            class="form-file-btn btn btn-default btn-primary select-none"
          >
            <span v-if="uploading">
              {{ __('Загрузка...') }}
            </span>
            
            <span v-else>
              {{ __('Загрузить новые данные') }}
            </span>
          </label>
        </span>
      </div>
    </div>
  </card>
</template>

<script>
export default {
  props: [
    'card',
    
    // The following props are only available on resource detail cards...
    // 'resource',
    // 'resourceId',
    // 'resourceName',
  
  ],
  
  data: () => {
    return {
      files:     null,
      uploading: false,
      downloading: false,
    };
  },
  
  mounted() {
    //
  },
  
  methods: {
    async downloadFile() {
      this.downloading = true;
      
      const response = await Nova.request()
        .get(
          '/nova-vendor/excel-data-update/download',
          {
            params:       {},
            responseType: 'blob', // important
          },
        );
  
      this.downloading = false;
      
      const url  = window.URL.createObjectURL(new Blob([response.data]));
      const link = document.createElement('a');
      
      link.href = url;
      link.setAttribute('download', 'export.xls');
      
      document.body.appendChild(link);
      
      link.click();
      link.remove();
    },
    
    async uploadFile(event) {
      
      const file = event.target.files[0];
      
      /*
       Initialize the form data
       */
      let formData = new FormData();
      
      /*
       Add the form data we need to submit
       */
      formData.append('file', file);
  
      this.uploading = true;
  
      /*
       Make the request to the POST /single-file URL
       */
      const result = await Nova.request()
        .post('/nova-vendor/excel-data-update/upload',
          formData,
          {
            headers: {
              'Content-Type': 'multipart/form-data',
            },
          },
        )
        .then(function () {
          Nova.success('Файл загружен, начата обработка');
        })
        .catch(function () {
          Nova.error('Ошибка при загрузке данных');
        });
  
      event.target.value = null;
      this.uploading = false;
    },
  },
};
</script>
