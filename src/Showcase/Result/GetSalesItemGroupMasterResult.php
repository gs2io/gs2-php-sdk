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
use Gs2\Showcase\Model\SalesItemGroupMaster;

/**
 * Result of getSalesItemGroupMaster: Get Sales Item Group Master
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#getsalesitemgroupmaster
 */
class GetSalesItemGroupMasterResult implements IResult {
    /** @var SalesItemGroupMaster Sales Item Group Master */
    private $item;

    /** @return SalesItemGroupMaster|null Sales Item Group Master */
	public function getItem(): ?SalesItemGroupMaster {
		return $this->item;
	}

    /** @param SalesItemGroupMaster|null $item Sales Item Group Master */
	public function setItem(?SalesItemGroupMaster $item) {
		$this->item = $item;
	}

    /**
     * @param SalesItemGroupMaster|null $item Sales Item Group Master
     * @return GetSalesItemGroupMasterResult
     */
	public function withItem(?SalesItemGroupMaster $item): GetSalesItemGroupMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetSalesItemGroupMasterResult {
        if ($data === null) {
            return null;
        }
        return (new GetSalesItemGroupMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? SalesItemGroupMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}