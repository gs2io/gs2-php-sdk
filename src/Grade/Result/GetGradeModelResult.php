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

namespace Gs2\Grade\Result;

use Gs2\Core\Model\IResult;
use Gs2\Grade\Model\DefaultGradeModel;
use Gs2\Grade\Model\GradeEntryModel;
use Gs2\Grade\Model\AcquireActionRate;
use Gs2\Grade\Model\GradeModel;

class GetGradeModelResult implements IResult {
    /** @var GradeModel */
    private $item;

	public function getItem(): ?GradeModel {
		return $this->item;
	}

	public function setItem(?GradeModel $item) {
		$this->item = $item;
	}

	public function withItem(?GradeModel $item): GetGradeModelResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetGradeModelResult {
        if ($data === null) {
            return null;
        }
        return (new GetGradeModelResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? GradeModel::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}