# ベースイメージ
FROM drupal:10

# Drupal フォルダをコピー
COPY ./drupal /var/www/html

# 権限を正しく設定
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# ポート公開
EXPOSE 80

# 起動コマンド
CMD ["apache2-foreground"]
