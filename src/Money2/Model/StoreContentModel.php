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


/**
 * Store Content Model
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#storecontentmodel
 */
class StoreContentModel implements IModel {
	/**
     * @var string Store Content Model GRN
	 */
	private $storeContentModelId;
	/**
     * @var string Store Content Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var AppleAppStoreContent Apple App Store Content
	 */
	private $appleAppStore;
	/**
     * @var GooglePlayContent Google Play Content
	 */
	private $googlePlay;
    /** @return string|null Store Content Model GRN */
	public function getStoreContentModelId(): ?string {
		return $this->storeContentModelId;
	}
    /** @param string|null $storeContentModelId Store Content Model GRN */
	public function setStoreContentModelId(?string $storeContentModelId) {
		$this->storeContentModelId = $storeContentModelId;
	}
    /**
     * @param string|null $storeContentModelId Store Content Model GRN
     * @return StoreContentModel
     */
	public function withStoreContentModelId(?string $storeContentModelId): StoreContentModel {
		$this->storeContentModelId = $storeContentModelId;
		return $this;
	}
    /** @return string|null Store Content Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Store Content Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Store Content Model name
     * @return StoreContentModel
     */
	public function withName(?string $name): StoreContentModel {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return StoreContentModel
     */
	public function withMetadata(?string $metadata): StoreContentModel {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return AppleAppStoreContent|null Apple App Store Content */
	public function getAppleAppStore(): ?AppleAppStoreContent {
		return $this->appleAppStore;
	}
    /** @param AppleAppStoreContent|null $appleAppStore Apple App Store Content */
	public function setAppleAppStore(?AppleAppStoreContent $appleAppStore) {
		$this->appleAppStore = $appleAppStore;
	}
    /**
     * @param AppleAppStoreContent|null $appleAppStore Apple App Store Content
     * @return StoreContentModel
     */
	public function withAppleAppStore(?AppleAppStoreContent $appleAppStore): StoreContentModel {
		$this->appleAppStore = $appleAppStore;
		return $this;
	}
    /** @return GooglePlayContent|null Google Play Content */
	public function getGooglePlay(): ?GooglePlayContent {
		return $this->googlePlay;
	}
    /** @param GooglePlayContent|null $googlePlay Google Play Content */
	public function setGooglePlay(?GooglePlayContent $googlePlay) {
		$this->googlePlay = $googlePlay;
	}
    /**
     * @param GooglePlayContent|null $googlePlay Google Play Content
     * @return StoreContentModel
     */
	public function withGooglePlay(?GooglePlayContent $googlePlay): StoreContentModel {
		$this->googlePlay = $googlePlay;
		return $this;
	}

    public static function fromJson(?array $data): ?StoreContentModel {
        if ($data === null) {
            return null;
        }
        return (new StoreContentModel())
            ->withStoreContentModelId(array_key_exists('storeContentModelId', $data) && $data['storeContentModelId'] !== null ? $data['storeContentModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withAppleAppStore(array_key_exists('appleAppStore', $data) && $data['appleAppStore'] !== null ? AppleAppStoreContent::fromJson($data['appleAppStore']) : null)
            ->withGooglePlay(array_key_exists('googlePlay', $data) && $data['googlePlay'] !== null ? GooglePlayContent::fromJson($data['googlePlay']) : null);
    }

    public function toJson(): array {
        return array(
            "storeContentModelId" => $this->getStoreContentModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "appleAppStore" => $this->getAppleAppStore() !== null ? $this->getAppleAppStore()->toJson() : null,
            "googlePlay" => $this->getGooglePlay() !== null ? $this->getGooglePlay()->toJson() : null,
        );
    }
}