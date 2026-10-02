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
 * Result of setExperienceByUserId: Set experience by User ID
 *
 * @see https://docs.gs2.io/api_reference/experience/sdk/#setexperiencebyuserid
 */
class SetExperienceByUserIdResult implements IResult {
    /** @var Status Status updated */
    private $item;
    /** @var Status Status before update */
    private $old;

    /** @return Status|null Status updated */
	public function getItem(): ?Status {
		return $this->item;
	}

    /** @param Status|null $item Status updated */
	public function setItem(?Status $item) {
		$this->item = $item;
	}

    /**
     * @param Status|null $item Status updated
     * @return SetExperienceByUserIdResult
     */
	public function withItem(?Status $item): SetExperienceByUserIdResult {
		$this->item = $item;
		return $this;
	}

    /** @return Status|null Status before update */
	public function getOld(): ?Status {
		return $this->old;
	}

    /** @param Status|null $old Status before update */
	public function setOld(?Status $old) {
		$this->old = $old;
	}

    /**
     * @param Status|null $old Status before update
     * @return SetExperienceByUserIdResult
     */
	public function withOld(?Status $old): SetExperienceByUserIdResult {
		$this->old = $old;
		return $this;
	}

    public static function fromJson(?array $data): ?SetExperienceByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new SetExperienceByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Status::fromJson($data['item']) : null)
            ->withOld(array_key_exists('old', $data) && $data['old'] !== null ? Status::fromJson($data['old']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "old" => $this->getOld() !== null ? $this->getOld()->toJson() : null,
        );
    }
}