help:
	@echo "Install TRex in your system"
	@echo "Usage: make [target]"
	@echo "Targets:"
	@echo "  install: install TRex in your system"
	@echo ""
	@echo "Examples:"
	@echo "  make install"

install:
	@sudo apt update
	@echo "Install main apps"
	@sudo apt install php git curl composer -y

	@echo "Install extensions"
	@sudo apt install php-common php-curl php-json php-readline php-fpm php-cli php-xml php-zip php-mbstring php-gd build-essential php-pear php-dev libmcrypt-dev -y

	@echo "Install mcrypt extension"
	@sudo pecl channel-update pecl.php.net
	@sudo pecl update-channels
	@sudo pecl search mcrypt
	@sudo pecl install mcrypt
	@sudo phpenmod mcrypt

	@echo "Clear all caches"
	@sudo apt autoremove -y

