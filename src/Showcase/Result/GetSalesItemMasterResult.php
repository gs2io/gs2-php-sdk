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

namespace Gs2\Showcase\Result;

use Gs2\Core\Model\IResult;
use Gs2\Showcase\Model\VerifyAction;
use Gs2\Showcase\Model\ConsumeAction;
use Gs2\Showcase\Model\AcquireAction;
use Gs2\Showcase\Model\SalesItemMaster;

/**
 * Result of getSalesItemMaster: Get Sales Item Master
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#getsalesitemmaster
 */
class GetSalesItemMasterResult implements IResult {
    /** @var SalesItemMaster Sales Item Master */
    private $item;

    /** @return SalesItemMaster|null Sales Item Master */
	public function getItem(): ?SalesItemMaster {
		return $this->item;
	}

    /** @param SalesItemMaster|null $item Sales Item Master */
	public function setItem(?SalesItemMaster $item) {
		$this->item = $item;
	}

    /**
     * @param SalesItemMaster|null $item Sales Item Master
     * @return GetSalesItemMasterResult
     */
	public function withItem(?SalesItemMaster $item): GetSalesItemMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetSalesItemMasterResult {
        if ($data === null) {
            return null;
        }
        return (new GetSalesItemMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? SalesItemMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}