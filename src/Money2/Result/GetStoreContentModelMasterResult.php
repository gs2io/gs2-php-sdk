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
use Gs2\Money2\Model\AppleAppStoreContent;
use Gs2\Money2\Model\GooglePlayContent;
use Gs2\Money2\Model\StoreContentModelMaster;

/**
 * Result of getStoreContentModelMaster: Get Store Content Master
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#getstorecontentmodelmaster
 */
class GetStoreContentModelMasterResult implements IResult {
    /** @var StoreContentModelMaster Store Content Master */
    private $item;

    /** @return StoreContentModelMaster|null Store Content Master */
	public function getItem(): ?StoreContentModelMaster {
		return $this->item;
	}

    /** @param StoreContentModelMaster|null $item Store Content Master */
	public function setItem(?StoreContentModelMaster $item) {
		$this->item = $item;
	}

    /**
     * @param StoreContentModelMaster|null $item Store Content Master
     * @return GetStoreContentModelMasterResult
     */
	public function withItem(?StoreContentModelMaster $item): GetStoreContentModelMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetStoreContentModelMasterResult {
        if ($data === null) {
            return null;
        }
        return (new GetStoreContentModelMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? StoreContentModelMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}