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

namespace Gs2\Limit\Result;

use Gs2\Core\Model\IResult;
use Gs2\Limit\Model\LimitModelMaster;

/**
 * Result of deleteLimitModelMaster: Delete Usage Limit Model Master
 *
 * @see https://docs.gs2.io/api_reference/limit/sdk/#deletelimitmodelmaster
 */
class DeleteLimitModelMasterResult implements IResult {
    /** @var LimitModelMaster Usage Limit Model Master deleted */
    private $item;

    /** @return LimitModelMaster|null Usage Limit Model Master deleted */
	public function getItem(): ?LimitModelMaster {
		return $this->item;
	}

    /** @param LimitModelMaster|null $item Usage Limit Model Master deleted */
	public function setItem(?LimitModelMaster $item) {
		$this->item = $item;
	}

    /**
     * @param LimitModelMaster|null $item Usage Limit Model Master deleted
     * @return DeleteLimitModelMasterResult
     */
	public function withItem(?LimitModelMaster $item): DeleteLimitModelMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteLimitModelMasterResult {
        if ($data === null) {
            return null;
        }
        return (new DeleteLimitModelMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? LimitModelMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}