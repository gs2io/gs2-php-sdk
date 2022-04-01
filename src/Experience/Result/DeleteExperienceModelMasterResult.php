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
use Gs2\Experience\Model\ExperienceModelMaster;

class DeleteExperienceModelMasterResult implements IResult {
    /** @var ExperienceModelMaster */
    private $item;

	public function getItem(): ?ExperienceModelMaster {
		return $this->item;
	}

	public function setItem(?ExperienceModelMaster $item) {
		$this->item = $item;
	}

	public function withItem(?ExperienceModelMaster $item): DeleteExperienceModelMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteExperienceModelMasterResult {
        if ($data === null) {
            return null;
        }
        return (new DeleteExperienceModelMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? ExperienceModelMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}