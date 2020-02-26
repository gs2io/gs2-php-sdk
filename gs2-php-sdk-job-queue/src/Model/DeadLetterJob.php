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

namespace Gs2\JobQueue\Model;

use Gs2\Core\Model\IModel;

/**
 * デッドレタージョブ
 *
 * @author Game Server Services, Inc.
 *
 */
class DeadLetterJob implements IModel {
	/**
     * @var string デッドレタージョブ
	 */
	protected $deadLetterJobId;

	/**
	 * デッドレタージョブを取得
	 *
	 * @return string|null デッドレタージョブ
	 */
	public function getDeadLetterJobId(): ?string {
		return $this->deadLetterJobId;
	}

	/**
	 * デッドレタージョブを設定
	 *
	 * @param string|null $deadLetterJobId デッドレタージョブ
	 */
	public function setDeadLetterJobId(?string $deadLetterJobId) {
		$this->deadLetterJobId = $deadLetterJobId;
	}

	/**
	 * デッドレタージョブを設定
	 *
	 * @param string|null $deadLetterJobId デッドレタージョブ
	 * @return DeadLetterJob $this
	 */
	public function withDeadLetterJobId(?string $deadLetterJobId): DeadLetterJob {
		$this->deadLetterJobId = $deadLetterJobId;
		return $this;
	}
	/**
     * @var string ジョブの名前
	 */
	protected $name;

	/**
	 * ジョブの名前を取得
	 *
	 * @return string|null ジョブの名前
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * ジョブの名前を設定
	 *
	 * @param string|null $name ジョブの名前
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * ジョブの名前を設定
	 *
	 * @param string|null $name ジョブの名前
	 * @return DeadLetterJob $this
	 */
	public function withName(?string $name): DeadLetterJob {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string ユーザーID
	 */
	protected $userId;

	/**
	 * ユーザーIDを取得
	 *
	 * @return string|null ユーザーID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 * @return DeadLetterJob $this
	 */
	public function withUserId(?string $userId): DeadLetterJob {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string ジョブの実行に使用するスクリプト のGRN
	 */
	protected $scriptId;

	/**
	 * ジョブの実行に使用するスクリプト のGRNを取得
	 *
	 * @return string|null ジョブの実行に使用するスクリプト のGRN
	 */
	public function getScriptId(): ?string {
		return $this->scriptId;
	}

	/**
	 * ジョブの実行に使用するスクリプト のGRNを設定
	 *
	 * @param string|null $scriptId ジョブの実行に使用するスクリプト のGRN
	 */
	public function setScriptId(?string $scriptId) {
		$this->scriptId = $scriptId;
	}

	/**
	 * ジョブの実行に使用するスクリプト のGRNを設定
	 *
	 * @param string|null $scriptId ジョブの実行に使用するスクリプト のGRN
	 * @return DeadLetterJob $this
	 */
	public function withScriptId(?string $scriptId): DeadLetterJob {
		$this->scriptId = $scriptId;
		return $this;
	}
	/**
     * @var string 引数
	 */
	protected $args;

	/**
	 * 引数を取得
	 *
	 * @return string|null 引数
	 */
	public function getArgs(): ?string {
		return $this->args;
	}

	/**
	 * 引数を設定
	 *
	 * @param string|null $args 引数
	 */
	public function setArgs(?string $args) {
		$this->args = $args;
	}

	/**
	 * 引数を設定
	 *
	 * @param string|null $args 引数
	 * @return DeadLetterJob $this
	 */
	public function withArgs(?string $args): DeadLetterJob {
		$this->args = $args;
		return $this;
	}
	/**
     * @var JobResultBody[] ジョブ実行結果
	 */
	protected $result;

	/**
	 * ジョブ実行結果を取得
	 *
	 * @return JobResultBody[]|null ジョブ実行結果
	 */
	public function getResult(): ?array {
		return $this->result;
	}

	/**
	 * ジョブ実行結果を設定
	 *
	 * @param JobResultBody[]|null $result ジョブ実行結果
	 */
	public function setResult(?array $result) {
		$this->result = $result;
	}

	/**
	 * ジョブ実行結果を設定
	 *
	 * @param JobResultBody[]|null $result ジョブ実行結果
	 * @return DeadLetterJob $this
	 */
	public function withResult(?array $result): DeadLetterJob {
		$this->result = $result;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return DeadLetterJob $this
	 */
	public function withCreatedAt(?int $createdAt): DeadLetterJob {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return DeadLetterJob $this
	 */
	public function withUpdatedAt(?int $updatedAt): DeadLetterJob {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "deadLetterJobId" => $this->deadLetterJobId,
            "name" => $this->name,
            "userId" => $this->userId,
            "scriptId" => $this->scriptId,
            "args" => $this->args,
            "result" => array_map(
                function (JobResultBody $v) {
                    return $v->toJson();
                },
                $this->result == null ? [] : $this->result
            ),
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): DeadLetterJob {
        $model = new DeadLetterJob();
        $model->setDeadLetterJobId(isset($data["deadLetterJobId"]) ? $data["deadLetterJobId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setScriptId(isset($data["scriptId"]) ? $data["scriptId"] : null);
        $model->setArgs(isset($data["args"]) ? $data["args"] : null);
        $model->setResult(array_map(
                function ($v) {
                    return JobResultBody::fromJson($v);
                },
                isset($data["result"]) ? $data["result"] : []
            )
        );
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}