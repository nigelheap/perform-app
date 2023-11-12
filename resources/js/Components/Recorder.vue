<script lang="ts" setup>
import Recorder from "recorder-js";
import { ref } from 'vue'

//const DEFAULT_OPTIONS = { sampleRate: 44100, bufferSize: 16384 };
const DEFAULT_OPTIONS = {   nFrequencyBars: 255, onAnalysed: undefined };

const isInitiated = ref(false);
const isRecording = ref(false);
const creatingResult = ref(false);
const audioContext = ref();
const recorder = ref();
const recordingEndedAt = ref();
const recordingStartedAt = ref();
const stream = ref();
const recorderOptions = ref(DEFAULT_OPTIONS);

const emit = defineEmits(['result'])
const record = async () => {
  if (!isInitiated.value) {
    await initiatePlayer();
  } else {
    if (!isRecording.value) {
      stream.value = await navigator.mediaDevices.getUserMedia({
        audio: true
      });
      recorder.value = new Recorder(audioContext.value, recorderOptions.value);
      recorder.value.init(stream.value);
      await recorder.value.start();
      recordingStartedAt.value = performance.now();
      isRecording.value = true;
    } else {
      recordingEndedAt.value = performance.now();
      isRecording.value = false;
      creatingResult.value = true;
      const tracks = stream.value.getTracks();
      tracks.forEach((track: any) => {
        track.stop();
      });

      const { blob, buffer } = await recorder.value.stop();

      emit("result", {
        blob: blob,
        duration: recordingEndedAt.value - recordingStartedAt.value,
        type: blob.type
      });

      creatingResult.value = false;
    }
  }
}

const initiatePlayer = async () => {
  audioContext.value = new (window.AudioContext ||
      window.webkitAudioContext)();

  isInitiated.value = true;
}

</script>
<template>
  <div>
    <span v-if="isInitiated && !isRecording && !creatingResult">Init mic</span>
    <button
        @click="record"
        :disabled="creatingResult"
        class="rounded-md bg-indigo-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
        :class="[
      isRecording && 'active',
      !isInitiated && 'needsInitiation',
      creatingResult && 'creating'
    ]"
    >
      <slot v-if="isInitiated && !isRecording && !creatingResult" />
      <slot v-if="!isInitiated" name="isInitiating" />
      <slot v-if="creatingResult" name="isCreating" />
      <slot v-if="isInitiated && isRecording" name="isRecording"></slot>
    </button>
  </div>
</template>
