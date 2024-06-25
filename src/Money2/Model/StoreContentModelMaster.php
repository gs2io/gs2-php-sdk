<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Money2\Model;

use Gs2\Core\Model\IModel;


class StoreContentModelMaster implements IModel {
	/**
     * @var string
	 */
	private $storeContentModelId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var AppleAppStoreContent
	 */
	private $appleAppStore;
	/**
     * @var GooglePlayContent
	 */
	private $googlePlay;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getStoreContentModelId(): ?string {
		return $this->storeContentModelId;
	}
	public function setStoreContentModelId(?string $storeContentModelId) {
		$this->storeContentModelId = $storeContentModelId;
	}
	public function withStoreContentModelId(?string $storeContentModelId): StoreContentModelMaster {
		$this->storeContentModelId = $storeContentModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): StoreContentModelMaster {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): StoreContentModelMaster {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): StoreContentModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	public function getAppleAppStore(): ?AppleAppStoreContent {
		return $this->appleAppStore;
	}
	public function setAppleAppStore(?AppleAppStoreContent $appleAppStore) {
		$this->appleAppStore = $appleAppStore;
	}
	public function withAppleAppStore(?AppleAppStoreContent $appleAppStore): StoreContentModelMaster {
		$this->appleAppStore = $appleAppStore;
		return $this;
	}
	public function getGooglePlay(): ?GooglePlayContent {
		return $this->googlePlay;
	}
	public function setGooglePlay(?GooglePlayContent $googlePlay) {
		$this->googlePlay = $googlePlay;
	}
	public function withGooglePlay(?GooglePlayContent $googlePlay): StoreContentModelMaster {
		$this->googlePlay = $googlePlay;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): StoreContentModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): StoreContentModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): StoreContentModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?StoreContentModelMaster {
        if ($data === null) {
            return null;
        }
        return (new StoreContentModelMaster())
            ->withStoreContentModelId(array_key_exists('storeContentModelId', $data) && $data['storeContentModelId'] !== null ? $data['storeContentModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withAppleAppStore(array_key_exists('appleAppStore', $data) && $data['appleAppStore'] !== null ? AppleAppStoreContent::fromJson($data['appleAppStore']) : null)
            ->withGooglePlay(array_key_exists('googlePlay', $data) && $data['googlePlay'] !== null ? GooglePlayContent::fromJson($data['googlePlay']) : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "storeContentModelId" => $this->getStoreContentModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "appleAppStore" => $this->getAppleAppStore() !== null ? $this->getAppleAppStore()->toJson() : null,
            "googlePlay" => $this->getGooglePlay() !== null ? $this->getGooglePlay()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}