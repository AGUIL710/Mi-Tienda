@props(['name' => 'image', 'value' => null])

<div id="{{ $name }}-wrapper">
    <image-uploader name="{{ $name }}" value="{{ $value }}"></image-uploader>
</div>

@pushOnce('scripts')
<script type="module">
app.component("image-uploader", {
    props: ['name', 'value'],

    data() {
        return {
            preview: this.value ? this.value : null, // ← muestra la imagen guardada
        };
    },

    methods: {
        openInput() {
            this.$refs.input.click();
        },

        onSelect(e) {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = (ev) => {
                this.preview = ev.target.result;
            };
            reader.readAsDataURL(file);
        }
    },

    template: `
        <div class="image-uploader-wrapper">
            
            <!-- Cuadro gris -->
            <div class="upload-box" @click="openInput">
                <div class="upload-content">
                    <span class="icon">📷</span>
                    <p class="upload-text">Subir imagen</p>
                    <p class="upload-formats">PNG, JPG, JPEG</p>
                </div>

                <input type="file"
                       :name="name"
                       ref="input"
                       accept="image/*"
                       class="hidden"
                       @change="onSelect">
            </div>

            <!-- Vista previa -->
            <div class="preview" v-if="preview">
                <img :src="preview" />
            </div>
        </div>
    `
});
</script>

<style>
.image-uploader-wrapper {
    display: flex;
    gap: 15px;
    align-items: center;
}

.upload-box {
    width: 160px;
    height: 160px;
    border: 2px dashed #ccc;
    border-radius: 10px;
    padding-top: 30px;
    text-align: center;
    cursor: pointer;
    transition: 0.3s;
}

.upload-box:hover {
    border-color: #888;
}

.preview img {
    width: 160px;
    height: 160px;
    object-fit: cover;
    border-radius: 10px;
}
</style>
@endPushOnce
