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
 * Content of Apple App Store
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#appleappstorecontent
 */
class AppleAppStoreContent implements IModel {
	/**
     * @var string Product ID
	 */
	private $productId;
    /** @return string|null Product ID */
	public function getProductId(): ?string {
		return $this->productId;
	}
    /** @param string|null $productId Product ID */
	public function setProductId(?string $productId) {
		$this->productId = $productId;
	}
    /**
     * @param string|null $productId Product ID
     * @return AppleAppStoreContent
     */
	public function withProductId(?string $productId): AppleAppStoreContent {
		$this->productId = $productId;
		return $this;
	}

    public static function fromJson(?array $data): ?AppleAppStoreContent {
        if ($data === null) {
            return null;
        }
        return (new AppleAppStoreContent())
            ->withProductId(array_key_exists('productId', $data) && $data['productId'] !== null ? $data['productId'] : null);
    }

    public function toJson(): array {
        return array(
            "productId" => $this->getProductId(),
        );
    }
}