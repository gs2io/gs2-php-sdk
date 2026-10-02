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

namespace Gs2\Exchange\Result;

use Gs2\Core\Model\IResult;
use Gs2\Exchange\Model\VerifyAction;
use Gs2\Exchange\Model\ConsumeAction;
use Gs2\Exchange\Model\AcquireAction;
use Gs2\Exchange\Model\RateModel;

/**
 * Result of getRateModel: Get Exchange Rate Model
 *
 * @see https://docs.gs2.io/api_reference/exchange/sdk/#getratemodel
 */
class GetRateModelResult implements IResult {
    /** @var RateModel Exchange Rate Model */
    private $item;

    /** @return RateModel|null Exchange Rate Model */
	public function getItem(): ?RateModel {
		return $this->item;
	}

    /** @param RateModel|null $item Exchange Rate Model */
	public function setItem(?RateModel $item) {
		$this->item = $item;
	}

    /**
     * @param RateModel|null $item Exchange Rate Model
     * @return GetRateModelResult
     */
	public function withItem(?RateModel $item): GetRateModelResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetRateModelResult {
        if ($data === null) {
            return null;
        }
        return (new GetRateModelResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? RateModel::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}