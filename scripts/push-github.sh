#!/bin/bash

set -e

REPO_DIR="$HOME/Documents/tenohiraganka-wordpress"

cd "$REPO_DIR"

echo "=== Git status ==="
git status

echo
echo "=== Git diff ==="
git diff

echo
read -p "GitHubへ反映しますか？ (y/N): " ANSWER

if [ "$ANSWER" != "y" ] && [ "$ANSWER" != "Y" ]; then
  echo "中止しました。"
  exit 0
fi

echo
read -p "Commit message: " MESSAGE

if [ -z "$MESSAGE" ]; then
  MESSAGE="Sync staging source"
fi

git add .

if git diff --cached --quiet; then
  echo "変更がありません。"
  exit 0
fi

git commit -m "$MESSAGE"
git push

echo
echo "=== GitHubへの反映が完了しました ==="
