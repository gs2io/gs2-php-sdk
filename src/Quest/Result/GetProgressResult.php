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
use Gs2\Quest\Model\Progress;
use Gs2\Quest\Model\QuestGroupModel;
use Gs2\Quest\Model\QuestModel;

/**
 * クエスト挑戦を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetProgressResult implements IResult {
	/** @var Progress クエスト挑戦 */
	private $item;
	/** @var QuestGroupModel クエストグループ */
	private $questGroup;
	/** @var QuestModel クエストモデル */
	private $quest;

	/**
	 * クエスト挑戦を取得
	 *
	 * @return Progress|null クエスト挑戦を取得
	 */
	public function getItem(): ?Progress {
		return $this->item;
	}

	/**
	 * クエスト挑戦を設定
	 *
	 * @param Progress|null $item クエスト挑戦を取得
	 */
	public function setItem(?Progress $item) {
		$this->item = $item;
	}

	/**
	 * クエストグループを取得
	 *
	 * @return QuestGroupModel|null クエスト挑戦を取得
	 */
	public function getQuestGroup(): ?QuestGroupModel {
		return $this->questGroup;
	}

	/**
	 * クエストグループを設定
	 *
	 * @param QuestGroupModel|null $questGroup クエスト挑戦を取得
	 */
	public function setQuestGroup(?QuestGroupModel $questGroup) {
		$this->questGroup = $questGroup;
	}

	/**
	 * クエストモデルを取得
	 *
	 * @return QuestModel|null クエスト挑戦を取得
	 */
	public function getQuest(): ?QuestModel {
		return $this->quest;
	}

	/**
	 * クエストモデルを設定
	 *
	 * @param QuestModel|null $quest クエスト挑戦を取得
	 */
	public function setQuest(?QuestModel $quest) {
		$this->quest = $quest;
	}

    public static function fromJson(array $data): GetProgressResult {
        $result = new GetProgressResult();
        $result->setItem(isset($data["item"]) ? Progress::fromJson($data["item"]) : null);
        $result->setQuestGroup(isset($data["questGroup"]) ? QuestGroupModel::fromJson($data["questGroup"]) : null);
        $result->setQuest(isset($data["quest"]) ? QuestModel::fromJson($data["quest"]) : null);
        return $result;
    }
}