<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">File Upload</div>
                    <div class="card-body">
                        <input type="file" @change="uploadFile" />
                        <div v-if="progress > 0">{{ progress }}%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            progress: 0,
        }
    },
    mounted() {
        //
    },
    methods: {
        async uploadFile(event) {
            const file = event.target.files[0];
            const formData = new FormData();
            formData.append('file', file);

            try {
                const response = await axios.post('/api/upload', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                    onUploadProgress: (progressEvent) => {
                        this.progress = Math.round((progressEvent.loaded / progressEvent.total) * 100);
                    },
                });
                console.log('File uploaded:', response.data.path);
            } catch (error) {
                console.error('Error uploading file:', error);
            }
        },
    },
};
</script>
