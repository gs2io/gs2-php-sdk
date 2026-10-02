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

namespace Gs2\Mission\Result;

use Gs2\Core\Model\IResult;
use Gs2\Mission\Model\VerifyAction;
use Gs2\Mission\Model\CounterScopeModel;
use Gs2\Mission\Model\CounterModel;

/**
 * Result of getCounterModel: Get Counter Model
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#getcountermodel
 */
class GetCounterModelResult implements IResult {
    /** @var CounterModel Counter Model */
    private $item;

    /** @return CounterModel|null Counter Model */
	public function getItem(): ?CounterModel {
		return $this->item;
	}

    /** @param CounterModel|null $item Counter Model */
	public function setItem(?CounterModel $item) {
		$this->item = $item;
	}

    /**
     * @param CounterModel|null $item Counter Model
     * @return GetCounterModelResult
     */
	public function withItem(?CounterModel $item): GetCounterModelResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetCounterModelResult {
        if ($data === null) {
            return null;
        }
        return (new GetCounterModelResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CounterModel::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}