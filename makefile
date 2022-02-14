IMAGE := laravel
VERSION := latest
# obj := nginx mysql redis laravel-echo-server php-worker
obj := nginx mysql redis laravel-echo-server

# .PHONY: all build rebuild shell run

CUR_DIR = $(shell pwd)
LARADOCK_DIR = $(CUR_DIR)/laradock

# 進專案要做的事
u:
	code .\
	&& cd $(LARADOCK_DIR)\
	&& docker-compose up -d $(obj)

# 下班用的指令
d:
	cd $(LARADOCK_DIR)\
	&& docker-compose down

# 進 CMD ，不一定會用到
c:
	cd $(LARADOCK_DIR)\
	&& docker-compose exec --user=laradock workspace bash

# 簡易用個排程
schedule:
	cd $(LARADOCK_DIR)\
	&& docker-compose up -d php-worker
