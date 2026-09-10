#!/bin/bash

set -e

SFTP_HOST="stg.tenohiraganka.com"
SFTP_USER="m.inoue"
SFTP_KEY="$HOME/Desktop/wp_tenohira/m.inoue.pem"

REMOTE_THEME="themes/hmr_tenohira_eye2025"
LOCAL_THEME="$HOME/Documents/tenohiraganka-wordpress/wp-content/themes"

echo "=== Download staging theme ==="

sftp -i "$SFTP_KEY" "$SFTP_USER@$SFTP_HOST" <<EOF
lcd $LOCAL_THEME
get -r $REMOTE_THEME
bye
EOF

echo
echo "=== Git status ==="

cd "$HOME/Documents/tenohiraganka-wordpress"
git status

echo
echo "=== Theme change check ==="

if git diff --quiet -- wp-content/themes/hmr_tenohira_eye2025; then
    echo "テーマに変更はありません。"
else
    echo "ステージングのテーマに変更があります。"
    echo
    git status --short -- wp-content/themes/hmr_tenohira_eye2025
fi
