#!/usr/bin/env bash
# Создаёт уменьшенные WebP-копии изображений в images/thumbs/<ширина>/...
# Шаблоны берут копию через thumb() в functions.php, а если её нет — оригинал.
# Запускать из корня сайта после добавления новых фото (нужен ImageMagick):
#   bash tools/make-thumbs.sh
set -euo pipefail
cd "$(dirname "$0")/.."

WIDTHS="320 640 1280"
DIRS="images/prodlist images/gallery images/interiors images/slider images/hpl images/tex images/propertis"

make_one() {
	src="$1"
	for w in $WIDTHS; do
		dst="images/thumbs/$w/${src#images/}.webp"
		if [ ! -f "$dst" ] || [ "$src" -nt "$dst" ]; then
			mkdir -p "$(dirname "$dst")"
			convert "$src" -auto-orient -strip -resize "${w}x>" -quality 78 "$dst"
		fi
	done
}
export -f make_one
export WIDTHS

# Миниатюры 200x200 в корне images/prodlist пропускаем: берём фото из папок моделей
find $DIRS -type f \( -iname '*.jpg' -o -iname '*.jpeg' -o -iname '*.png' \) \
	-not -path 'images/thumbs/*' \
	-not \( -path 'images/prodlist/*' -not -path 'images/prodlist/*/*' \) \
	-print0 | xargs -0 -n 1 -P "$(nproc 2>/dev/null || echo 4)" bash -c 'make_one "$0"'

echo "Готово: $(find images/thumbs -type f | wc -l) файлов, $(du -sh images/thumbs | cut -f1)"
