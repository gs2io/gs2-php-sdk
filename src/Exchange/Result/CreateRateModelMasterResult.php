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
use Gs2\Exchange\Model\RateModelMaster;

/**
 * Result of createRateModelMaster: Create Exchange Rate Model Master
 *
 * @see https://docs.gs2.io/api_reference/exchange/sdk/#createratemodelmaster
 */
class CreateRateModelMasterResult implements IResult {
    /** @var RateModelMaster Exchange Rate Model Master created */
    private $item;

    /** @return RateModelMaster|null Exchange Rate Model Master created */
	public function getItem(): ?RateModelMaster {
		return $this->item;
	}

    /** @param RateModelMaster|null $item Exchange Rate Model Master created */
	public function setItem(?RateModelMaster $item) {
		$this->item = $item;
	}

    /**
     * @param RateModelMaster|null $item Exchange Rate Model Master created
     * @return CreateRateModelMasterResult
     */
	public function withItem(?RateModelMaster $item): CreateRateModelMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateRateModelMasterResult {
        if ($data === null) {
            return null;
        }
        return (new CreateRateModelMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? RateModelMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}