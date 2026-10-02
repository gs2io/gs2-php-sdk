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

namespace Gs2\Experience\Result;

use Gs2\Core\Model\IResult;
use Gs2\Experience\Model\Status;

/**
 * Result of addExperienceByStampSheet: Execute the addition of experience as an acquire action
 *
 * @see https://docs.gs2.io/api_reference/experience/stamp_sheet/#gs2experienceaddexperiencebyuserid
 */
class AddExperienceByStampSheetResult implements IResult {
    /** @var Status Status after addition */
    private $item;

    /** @return Status|null Status after addition */
	public function getItem(): ?Status {
		return $this->item;
	}

    /** @param Status|null $item Status after addition */
	public function setItem(?Status $item) {
		$this->item = $item;
	}

    /**
     * @param Status|null $item Status after addition
     * @return AddExperienceByStampSheetResult
     */
	public function withItem(?Status $item): AddExperienceByStampSheetResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?AddExperienceByStampSheetResult {
        if ($data === null) {
            return null;
        }
        return (new AddExperienceByStampSheetResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Status::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}