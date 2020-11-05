---
title: Tips & tricks
description: ''
position: 2
category: 'CSS'
---

## Flip horizontally / vertically

<flip></flip>

```css
span {
  display: inline-block;
}
.flip_H {
  transform: scale(-1, 1);
}
.flip_V {
  transform: scale(1, -1);
}
```

```html
<span class="flip_H">
  Demo text &#9986;
</span>
<span class="flip_V">
  Demo text &#9986;
</span>
```