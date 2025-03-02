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

namespace Gs2\Money2\Result;

use Gs2\Core\Model\IResult;
use Gs2\Money2\Model\AppleAppStoreSubscriptionContent;
use Gs2\Money2\Model\GooglePlaySubscriptionContent;
use Gs2\Money2\Model\StoreSubscriptionContentModelMaster;

class CreateStoreSubscriptionContentModelMasterResult implements IResult {
    /** @var StoreSubscriptionContentModelMaster */
    private $item;

	public function getItem(): ?StoreSubscriptionContentModelMaster {
		return $this->item;
	}

	public function setItem(?StoreSubscriptionContentModelMaster $item) {
		$this->item = $item;
	}

	public function withItem(?StoreSubscriptionContentModelMaster $item): CreateStoreSubscriptionContentModelMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateStoreSubscriptionContentModelMasterResult {
        if ($data === null) {
            return null;
        }
        return (new CreateStoreSubscriptionContentModelMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? StoreSubscriptionContentModelMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}