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

namespace Gs2\Enchant\Result;

use Gs2\Core\Model\IResult;
use Gs2\Enchant\Model\BalanceParameterValue;
use Gs2\Enchant\Model\BalanceParameterStatus;

/**
 * Result of getBalanceParameterStatusByUserId: Get Balance Parameter Status by User ID
 *
 * @see https://docs.gs2.io/api_reference/enchant/sdk/#getbalanceparameterstatusbyuserid
 */
class GetBalanceParameterStatusByUserIdResult implements IResult {
    /** @var BalanceParameterStatus Balance Parameter Status */
    private $item;

    /** @return BalanceParameterStatus|null Balance Parameter Status */
	public function getItem(): ?BalanceParameterStatus {
		return $this->item;
	}

    /** @param BalanceParameterStatus|null $item Balance Parameter Status */
	public function setItem(?BalanceParameterStatus $item) {
		$this->item = $item;
	}

    /**
     * @param BalanceParameterStatus|null $item Balance Parameter Status
     * @return GetBalanceParameterStatusByUserIdResult
     */
	public function withItem(?BalanceParameterStatus $item): GetBalanceParameterStatusByUserIdResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetBalanceParameterStatusByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new GetBalanceParameterStatusByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? BalanceParameterStatus::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}