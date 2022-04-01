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

namespace Gs2\Quest\Result;

use Gs2\Core\Model\IResult;
use Gs2\Quest\Model\Reward;
use Gs2\Quest\Model\Progress;
use Gs2\Quest\Model\AcquireAction;
use Gs2\Quest\Model\Contents;
use Gs2\Quest\Model\ConsumeAction;
use Gs2\Quest\Model\QuestModel;
use Gs2\Quest\Model\QuestGroupModel;

class GetProgressResult implements IResult {
    /** @var Progress */
    private $item;
    /** @var QuestGroupModel */
    private $questGroup;
    /** @var QuestModel */
    private $quest;

	public function getItem(): ?Progress {
		return $this->item;
	}

	public function setItem(?Progress $item) {
		$this->item = $item;
	}

	public function withItem(?Progress $item): GetProgressResult {
		$this->item = $item;
		return $this;
	}

	public function getQuestGroup(): ?QuestGroupModel {
		return $this->questGroup;
	}

	public function setQuestGroup(?QuestGroupModel $questGroup) {
		$this->questGroup = $questGroup;
	}

	public function withQuestGroup(?QuestGroupModel $questGroup): GetProgressResult {
		$this->questGroup = $questGroup;
		return $this;
	}

	public function getQuest(): ?QuestModel {
		return $this->quest;
	}

	public function setQuest(?QuestModel $quest) {
		$this->quest = $quest;
	}

	public function withQuest(?QuestModel $quest): GetProgressResult {
		$this->quest = $quest;
		return $this;
	}

    public static function fromJson(?array $data): ?GetProgressResult {
        if ($data === null) {
            return null;
        }
        return (new GetProgressResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Progress::fromJson($data['item']) : null)
            ->withQuestGroup(array_key_exists('questGroup', $data) && $data['questGroup'] !== null ? QuestGroupModel::fromJson($data['questGroup']) : null)
            ->withQuest(array_key_exists('quest', $data) && $data['quest'] !== null ? QuestModel::fromJson($data['quest']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "questGroup" => $this->getQuestGroup() !== null ? $this->getQuestGroup()->toJson() : null,
            "quest" => $this->getQuest() !== null ? $this->getQuest()->toJson() : null,
        );
    }
}