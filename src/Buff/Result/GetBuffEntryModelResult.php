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
use Gs2\Buff\Model\BuffEntryModel;

/**
 * Result of getBuffEntryModel: Get Buff Entry Model
 *
 * @see https://docs.gs2.io/api_reference/buff/sdk/#getbuffentrymodel
 */
class GetBuffEntryModelResult implements IResult {
    /** @var BuffEntryModel Buff Entry Model */
    private $item;

    /** @return BuffEntryModel|null Buff Entry Model */
	public function getItem(): ?BuffEntryModel {
		return $this->item;
	}

    /** @param BuffEntryModel|null $item Buff Entry Model */
	public function setItem(?BuffEntryModel $item) {
		$this->item = $item;
	}

    /**
     * @param BuffEntryModel|null $item Buff Entry Model
     * @return GetBuffEntryModelResult
     */
	public function withItem(?BuffEntryModel $item): GetBuffEntryModelResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetBuffEntryModelResult {
        if ($data === null) {
            return null;
        }
        return (new GetBuffEntryModelResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? BuffEntryModel::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}