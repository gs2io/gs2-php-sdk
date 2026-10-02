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

namespace Gs2\Stamina\Result;

use Gs2\Core\Model\IResult;
use Gs2\Stamina\Model\RecoverIntervalTableMaster;

/**
 * Result of updateRecoverIntervalTableMaster: Update Recovery Interval Table Master
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#updaterecoverintervaltablemaster
 */
class UpdateRecoverIntervalTableMasterResult implements IResult {
    /** @var RecoverIntervalTableMaster Recovery Interval Table Master updated */
    private $item;

    /** @return RecoverIntervalTableMaster|null Recovery Interval Table Master updated */
	public function getItem(): ?RecoverIntervalTableMaster {
		return $this->item;
	}

    /** @param RecoverIntervalTableMaster|null $item Recovery Interval Table Master updated */
	public function setItem(?RecoverIntervalTableMaster $item) {
		$this->item = $item;
	}

    /**
     * @param RecoverIntervalTableMaster|null $item Recovery Interval Table Master updated
     * @return UpdateRecoverIntervalTableMasterResult
     */
	public function withItem(?RecoverIntervalTableMaster $item): UpdateRecoverIntervalTableMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateRecoverIntervalTableMasterResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateRecoverIntervalTableMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? RecoverIntervalTableMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}