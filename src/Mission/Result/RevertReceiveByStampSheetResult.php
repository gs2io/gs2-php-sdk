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
use Gs2\Mission\Model\Complete;

/**
 * Result of revertReceiveByStampSheet: Revert mission reward receipt as an acquire action within a distributed transaction
 *
 * @see https://docs.gs2.io/api_reference/mission/stamp_sheet/#gs2missionrevertreceivebyuserid
 */
class RevertReceiveByStampSheetResult implements IResult {
    /** @var Complete Completion Status */
    private $item;

    /** @return Complete|null Completion Status */
	public function getItem(): ?Complete {
		return $this->item;
	}

    /** @param Complete|null $item Completion Status */
	public function setItem(?Complete $item) {
		$this->item = $item;
	}

    /**
     * @param Complete|null $item Completion Status
     * @return RevertReceiveByStampSheetResult
     */
	public function withItem(?Complete $item): RevertReceiveByStampSheetResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?RevertReceiveByStampSheetResult {
        if ($data === null) {
            return null;
        }
        return (new RevertReceiveByStampSheetResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Complete::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}