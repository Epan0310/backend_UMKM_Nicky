download_with_resume() {
  url=$1
  dest=$2
  mkdir -p "$(dirname "$dest")"
  until wget -c --timeout=5 --tries=1 -O "$dest" "$url"; do
    echo "Resuming $dest..."
    sleep 1
  done
}

download_with_resume "https://codeload.github.com/livewire/livewire/legacy.zip/514b29d5a23594d4e4846494f580268b20c2f11e" "/home/danish/.cache/composer/files/livewire/livewire/514b29d5a23594d4e4846494f580268b20c2f11e.zip"
download_with_resume "https://codeload.github.com/FakerPHP/Faker/legacy.zip/e0ee18eb1e6dc3cda3ce9fd97e5a0689a88a64b5" "/home/danish/.cache/composer/files/fakerphp/faker/e0ee18eb1e6dc3cda3ce9fd97e5a0689a88a64b5.zip"
download_with_resume "https://codeload.github.com/laravel/pint/legacy.zip/fe4148c503a0e266353d61396b79bbf7f35122df" "/home/danish/.cache/composer/files/laravel/pint/fe4148c503a0e266353d61396b79bbf7f35122df.zip"
