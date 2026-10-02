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

/**
 * Result of getGradeModel: Get Grade Model
 *
 * @see https://docs.gs2.io/api_reference/grade/sdk/#getgrademodel
 */
class GetGradeModelResult implements IResult {
    /** @var GradeModel Grade Model */
    private $item;

    /** @return GradeModel|null Grade Model */
	public function getItem(): ?GradeModel {
		return $this->item;
	}

    /** @param GradeModel|null $item Grade Model */
	public function setItem(?GradeModel $item) {
		$this->item = $item;
	}

    /**
     * @param GradeModel|null $item Grade Model
     * @return GetGradeModelResult
     */
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