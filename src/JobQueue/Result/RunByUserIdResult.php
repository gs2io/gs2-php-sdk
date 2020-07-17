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

namespace Gs2\JobQueue\Result;

use Gs2\Core\Model\IResult;
use Gs2\JobQueue\Model\Job;
use Gs2\JobQueue\Model\JobResultBody;

/**
 * ユーザIDを指定してジョブを実行 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class RunByUserIdResult implements IResult {
	/** @var Job ジョブ */
	private $item;
	/** @var JobResultBody ジョブの実行結果 */
	private $result;
	/** @var bool None */
	private $isLastJob;

	/**
	 * ジョブを取得
	 *
	 * @return Job|null ユーザIDを指定してジョブを実行
	 */
	public function getItem(): ?Job {
		return $this->item;
	}

	/**
	 * ジョブを設定
	 *
	 * @param Job|null $item ユーザIDを指定してジョブを実行
	 */
	public function setItem(?Job $item) {
		$this->item = $item;
	}

	/**
	 * ジョブの実行結果を取得
	 *
	 * @return JobResultBody|null ユーザIDを指定してジョブを実行
	 */
	public function getResult(): ?JobResultBody {
		return $this->result;
	}

	/**
	 * ジョブの実行結果を設定
	 *
	 * @param JobResultBody|null $result ユーザIDを指定してジョブを実行
	 */
	public function setResult(?JobResultBody $result) {
		$this->result = $result;
	}

	/**
	 * Noneを取得
	 *
	 * @return bool|null ユーザIDを指定してジョブを実行
	 */
	public function getIsLastJob(): ?bool {
		return $this->isLastJob;
	}

	/**
	 * Noneを設定
	 *
	 * @param bool|null $isLastJob ユーザIDを指定してジョブを実行
	 */
	public function setIsLastJob(?bool $isLastJob) {
		$this->isLastJob = $isLastJob;
	}

    public static function fromJson(array $data): RunByUserIdResult {
        $result = new RunByUserIdResult();
        $result->setItem(isset($data["item"]) ? Job::fromJson($data["item"]) : null);
        $result->setResult(isset($data["result"]) ? JobResultBody::fromJson($data["result"]) : null);
        $result->setIsLastJob(isset($data["isLastJob"]) ? $data["isLastJob"] : null);
        return $result;
    }
}