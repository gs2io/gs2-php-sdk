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

namespace Gs2\Buff\Result;

use Gs2\Core\Model\IResult;
use Gs2\Buff\Model\BuffTargetGrn;
use Gs2\Buff\Model\BuffTargetModel;
use Gs2\Buff\Model\BuffTargetAction;
use Gs2\Buff\Model\BuffEntryModelMaster;

class UpdateBuffEntryModelMasterResult implements IResult {
    /** @var BuffEntryModelMaster */
    private $item;

	public function getItem(): ?BuffEntryModelMaster {
		return $this->item;
	}

	public function setItem(?BuffEntryModelMaster $item) {
		$this->item = $item;
	}

	public function withItem(?BuffEntryModelMaster $item): UpdateBuffEntryModelMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateBuffEntryModelMasterResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateBuffEntryModelMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? BuffEntryModelMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}