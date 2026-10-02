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
use Gs2\Exchange\Model\ConsumeAction;
use Gs2\Exchange\Model\AcquireAction;
use Gs2\Exchange\Model\IncrementalRateModelMaster;

/**
 * Result of createIncrementalRateModelMaster: Create Incremental Cost Exchange Rate Model Master
 *
 * @see https://docs.gs2.io/api_reference/exchange/sdk/#createincrementalratemodelmaster
 */
class CreateIncrementalRateModelMasterResult implements IResult {
    /** @var IncrementalRateModelMaster Incremental Cost Exchange Rate Model Master created */
    private $item;

    /** @return IncrementalRateModelMaster|null Incremental Cost Exchange Rate Model Master created */
	public function getItem(): ?IncrementalRateModelMaster {
		return $this->item;
	}

    /** @param IncrementalRateModelMaster|null $item Incremental Cost Exchange Rate Model Master created */
	public function setItem(?IncrementalRateModelMaster $item) {
		$this->item = $item;
	}

    /**
     * @param IncrementalRateModelMaster|null $item Incremental Cost Exchange Rate Model Master created
     * @return CreateIncrementalRateModelMasterResult
     */
	public function withItem(?IncrementalRateModelMaster $item): CreateIncrementalRateModelMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateIncrementalRateModelMasterResult {
        if ($data === null) {
            return null;
        }
        return (new CreateIncrementalRateModelMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? IncrementalRateModelMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}