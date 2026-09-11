<template>
  <div class="rich-editor">
    <div class="re-toolbar" v-if="editor" role="toolbar" aria-label="Formatting toolbar">
      <button type="button" class="re-btn" :class="{ active: editor.isActive('bold') }"
        @click="editor.chain().focus().toggleBold().run()" title="Bold (Ctrl+B)" aria-label="Bold">
        <i class="ti ti-bold" aria-hidden="true"></i>
      </button>
      <button type="button" class="re-btn" :class="{ active: editor.isActive('italic') }"
        @click="editor.chain().focus().toggleItalic().run()" title="Italic (Ctrl+I)" aria-label="Italic">
        <i class="ti ti-italic" aria-hidden="true"></i>
      </button>
      <button type="button" class="re-btn" :class="{ active: editor.isActive('underline') }"
        @click="editor.chain().focus().toggleUnderline().run()" title="Underline (Ctrl+U)" aria-label="Underline">
        <i class="ti ti-underline" aria-hidden="true"></i>
      </button>

      <span class="re-sep" aria-hidden="true"></span>

      <button type="button" class="re-btn" :class="{ active: editor.isActive('heading', { level: 2 }) }"
        @click="editor.chain().focus().toggleHeading({ level: 2 }).run()" title="Heading 2" aria-label="Heading 2">
        <i class="ti ti-h-2" aria-hidden="true"></i>
      </button>
      <button type="button" class="re-btn" :class="{ active: editor.isActive('heading', { level: 3 }) }"
        @click="editor.chain().focus().toggleHeading({ level: 3 }).run()" title="Heading 3" aria-label="Heading 3">
        <i class="ti ti-h-3" aria-hidden="true"></i>
      </button>

      <span class="re-sep" aria-hidden="true"></span>

      <button type="button" class="re-btn" :class="{ active: editor.isActive('bulletList') }"
        @click="editor.chain().focus().toggleBulletList().run()" title="Bullet list" aria-label="Bullet list">
        <i class="ti ti-list" aria-hidden="true"></i>
      </button>
      <button type="button" class="re-btn" :class="{ active: editor.isActive('orderedList') }"
        @click="editor.chain().focus().toggleOrderedList().run()" title="Numbered list" aria-label="Numbered list">
        <i class="ti ti-list-numbers" aria-hidden="true"></i>
      </button>
      <button type="button" class="re-btn" :class="{ active: editor.isActive('blockquote') }"
        @click="editor.chain().focus().toggleBlockquote().run()" title="Quote" aria-label="Quote">
        <i class="ti ti-quote" aria-hidden="true"></i>
      </button>

      <span class="re-sep" aria-hidden="true"></span>

      <button type="button" class="re-btn" :class="{ active: editor.isActive('link') }"
        @click="setLink" title="Add or edit link" aria-label="Link">
        <i class="ti ti-link" aria-hidden="true"></i>
      </button>
      <button type="button" class="re-btn" @click="editor.chain().focus().unsetLink().run()"
        :disabled="!editor.isActive('link')" title="Remove link" aria-label="Remove link">
        <i class="ti ti-unlink" aria-hidden="true"></i>
      </button>

      <span class="re-sep" aria-hidden="true"></span>

      <button type="button" class="re-btn" @click="editor.chain().focus().undo().run()"
        :disabled="!editor.can().undo()" title="Undo (Ctrl+Z)" aria-label="Undo">
        <i class="ti ti-arrow-back-up" aria-hidden="true"></i>
      </button>
      <button type="button" class="re-btn" @click="editor.chain().focus().redo().run()"
        :disabled="!editor.can().redo()" title="Redo (Ctrl+Y)" aria-label="Redo">
        <i class="ti ti-arrow-forward-up" aria-hidden="true"></i>
      </button>

      <span class="re-sep" aria-hidden="true"></span>

      <button type="button" class="re-btn re-btn-text" @click="editor.chain().focus().clearNodes().unsetAllMarks().run()"
        title="Clear formatting" aria-label="Clear formatting">
        <i class="ti ti-clear-formatting" aria-hidden="true"></i>
      </button>
    </div>

    <editor-content :editor="editor" class="re-content" />
  </div>
</template>

<script setup>
import { watch } from 'vue';
import { useEditor, EditorContent } from '@tiptap/vue-3';
import StarterKit from '@tiptap/starter-kit';

const props = defineProps({
  modelValue: { type: String, default: '' },
});
const emit = defineEmits(['update:modelValue']);

// useEditor (not `new Editor()`) is the Vue 3 pattern: it makes editor.isActive
// / can().undo() reactive in the toolbar and auto-destroys on unmount.
// StarterKit v3 already bundles Link and Underline, so they are configured
// through it rather than registered separately (double registration throws).
const editor = useEditor({
  content: props.modelValue || '',
  extensions: [
    StarterKit.configure({
      heading: { levels: [2, 3] },
      link: {
        openOnClick: false,
        autolink: true,
        HTMLAttributes: { rel: 'noopener noreferrer', target: '_blank' },
      },
    }),
  ],
  onUpdate: ({ editor }) => {
    const html = editor.getHTML();
    // TipTap emits "<p></p>" for an empty doc; normalise that to "".
    emit('update:modelValue', html === '<p></p>' ? '' : html);
  },
});

// Keep the editor in sync if the bound value is replaced from outside
// (e.g. loading an existing post to edit, or clearing the form after save).
watch(() => props.modelValue, (val) => {
  if (!editor.value) return;
  const current = editor.value.getHTML();
  const incoming = val || '';
  if (incoming !== current && !(incoming === '' && current === '<p></p>')) {
    editor.value.commands.setContent(incoming, false);
  }
});

const setLink = () => {
  const previous = editor.value.getAttributes('link').href;
  const url = window.prompt('Link URL', previous || 'https://');
  if (url === null) return;            // cancelled
  if (url === '') {                     // empty = remove
    editor.value.chain().focus().unsetLink().run();
    return;
  }
  editor.value.chain().focus().extendMarkRange('link').setLink({ href: url }).run();
};
</script>

<style scoped>
.rich-editor {
  border: 0.5px solid #dde1e9;
  border-radius: 8px;
  overflow: hidden;
  background: #fff;
}
.re-toolbar {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  gap: 2px;
  padding: 8px 10px;
  background: #f7f8fb;
  border-bottom: 0.5px solid #dde1e9;
}
.re-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 30px;
  height: 30px;
  border: 0.5px solid transparent;
  border-radius: 6px;
  background: transparent;
  color: #1a2233;
  font-size: 16px;
  cursor: pointer;
  transition: background .12s, border-color .12s, color .12s;
}
.re-btn:hover:not(:disabled) {
  background: #eef1f6;
  border-color: #dde1e9;
}
.re-btn.active {
  background: #002366;
  color: #fff;
}
.re-btn:disabled {
  opacity: 0.35;
  cursor: default;
}
.re-btn-text {
  width: auto;
  padding: 0 8px;
  font-size: 15px;
}
.re-sep {
  width: 1px;
  height: 20px;
  background: #dde1e9;
  margin: 0 4px;
}
.re-content {
  padding: 4px 2px;
}
/* Editable surface */
.re-content :deep(.ProseMirror) {
  min-height: 320px;
  padding: 16px 18px;
  outline: none;
  font-size: 15px;
  line-height: 1.7;
  color: #1a2233;
}
.re-content :deep(.ProseMirror:focus) {
  outline: none;
}
.re-content :deep(.ProseMirror p) {
  margin: 0 0 14px;
}
.re-content :deep(.ProseMirror h2) {
  font-size: 22px;
  font-weight: 700;
  color: #002366;
  margin: 24px 0 10px;
  line-height: 1.3;
}
.re-content :deep(.ProseMirror h3) {
  font-size: 18px;
  font-weight: 700;
  color: #002366;
  margin: 20px 0 8px;
  line-height: 1.35;
}
.re-content :deep(.ProseMirror ul),
.re-content :deep(.ProseMirror ol) {
  padding-left: 24px;
  margin: 0 0 14px;
}
.re-content :deep(.ProseMirror li) {
  margin: 4px 0;
}
.re-content :deep(.ProseMirror blockquote) {
  border-left: 3px solid #708090;
  margin: 0 0 14px;
  padding-left: 16px;
  color: #4a5568;
  font-style: italic;
}
.re-content :deep(.ProseMirror a) {
  color: #002366;
  text-decoration: underline;
}
/* Placeholder-ish empty state uses the browser default; keep simple. */
.re-content :deep(.ProseMirror strong) { font-weight: 700; }
.re-content :deep(.ProseMirror em) { font-style: italic; }
</style>
