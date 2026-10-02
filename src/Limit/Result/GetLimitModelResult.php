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
use Gs2\Limit\Model\LimitModel;

/**
 * Result of getLimitModel: Get Usage Limit Model
 *
 * @see https://docs.gs2.io/api_reference/limit/sdk/#getlimitmodel
 */
class GetLimitModelResult implements IResult {
    /** @var LimitModel Usage Limit Model */
    private $item;

    /** @return LimitModel|null Usage Limit Model */
	public function getItem(): ?LimitModel {
		return $this->item;
	}

    /** @param LimitModel|null $item Usage Limit Model */
	public function setItem(?LimitModel $item) {
		$this->item = $item;
	}

    /**
     * @param LimitModel|null $item Usage Limit Model
     * @return GetLimitModelResult
     */
	public function withItem(?LimitModel $item): GetLimitModelResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetLimitModelResult {
        if ($data === null) {
            return null;
        }
        return (new GetLimitModelResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? LimitModel::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}