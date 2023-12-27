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

namespace Gs2\Enhance\Result;

use Gs2\Core\Model\IResult;
use Gs2\Enhance\Model\UnleashRateEntryModel;
use Gs2\Enhance\Model\UnleashRateModelMaster;

class GetUnleashRateModelMasterResult implements IResult {
    /** @var UnleashRateModelMaster */
    private $item;

	public function getItem(): ?UnleashRateModelMaster {
		return $this->item;
	}

	public function setItem(?UnleashRateModelMaster $item) {
		$this->item = $item;
	}

	public function withItem(?UnleashRateModelMaster $item): GetUnleashRateModelMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetUnleashRateModelMasterResult {
        if ($data === null) {
            return null;
        }
        return (new GetUnleashRateModelMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? UnleashRateModelMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}