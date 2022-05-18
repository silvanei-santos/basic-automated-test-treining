ARTIFACT_REVISION=dev
PROJECT_NAME=basic-automated-test-treining
PROJECT_DIR=$(shell pwd)
USER_ID=$(shell id -u)
USER_GROUP=$(shell id -g)
DOCKER_CONTAINER_RUN=docker container run \
	-it \
	--rm \
	--cpus=.5 \
	-m 1024m \
	-u $(USER_ID):$(USER_GROUP) \
	-v $(PROJECT_DIR):/opt/$(PROJECT_NAME) \
	-w /opt/$(PROJECT_NAME) $(PROJECT_NAME):$(ARTIFACT_REVISION)

.PHONY: default
default: sh;

image:
	docker build -t $(PROJECT_NAME):$(ARTIFACT_REVISION) .

check: image
	$(DOCKER_CONTAINER_RUN) composer check

test: image
	$(DOCKER_CONTAINER_RUN) composer test

sh: image
	$(DOCKER_CONTAINER_RUN) sh

composer-install: image
	$(DOCKER_CONTAINER_RUN) composer install

test-coverage: image
	$(DOCKER_CONTAINER_RUN) composer test-coverage

phpstan: image
	$(DOCKER_CONTAINER_RUN) composer phpstan

phpcs: image
	$(DOCKER_CONTAINER_RUN) composer phpcs