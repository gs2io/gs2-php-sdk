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
 * ジョブの実行結果
 *
 * @author Game Server Services, Inc.
 *
 */
class JobResultBody implements IModel {
	/**
     * @var int 試行回数
	 */
	protected $tryNumber;

	/**
	 * 試行回数を取得
	 *
	 * @return int|null 試行回数
	 */
	public function getTryNumber(): ?int {
		return $this->tryNumber;
	}

	/**
	 * 試行回数を設定
	 *
	 * @param int|null $tryNumber 試行回数
	 */
	public function setTryNumber(?int $tryNumber) {
		$this->tryNumber = $tryNumber;
	}

	/**
	 * 試行回数を設定
	 *
	 * @param int|null $tryNumber 試行回数
	 * @return JobResultBody $this
	 */
	public function withTryNumber(?int $tryNumber): JobResultBody {
		$this->tryNumber = $tryNumber;
		return $this;
	}
	/**
     * @var int ステータスコード
	 */
	protected $statusCode;

	/**
	 * ステータスコードを取得
	 *
	 * @return int|null ステータスコード
	 */
	public function getStatusCode(): ?int {
		return $this->statusCode;
	}

	/**
	 * ステータスコードを設定
	 *
	 * @param int|null $statusCode ステータスコード
	 */
	public function setStatusCode(?int $statusCode) {
		$this->statusCode = $statusCode;
	}

	/**
	 * ステータスコードを設定
	 *
	 * @param int|null $statusCode ステータスコード
	 * @return JobResultBody $this
	 */
	public function withStatusCode(?int $statusCode): JobResultBody {
		$this->statusCode = $statusCode;
		return $this;
	}
	/**
     * @var string レスポンスの内容
	 */
	protected $result;

	/**
	 * レスポンスの内容を取得
	 *
	 * @return string|null レスポンスの内容
	 */
	public function getResult(): ?string {
		return $this->result;
	}

	/**
	 * レスポンスの内容を設定
	 *
	 * @param string|null $result レスポンスの内容
	 */
	public function setResult(?string $result) {
		$this->result = $result;
	}

	/**
	 * レスポンスの内容を設定
	 *
	 * @param string|null $result レスポンスの内容
	 * @return JobResultBody $this
	 */
	public function withResult(?string $result): JobResultBody {
		$this->result = $result;
		return $this;
	}
	/**
     * @var int 実行日時
	 */
	protected $tryAt;

	/**
	 * 実行日時を取得
	 *
	 * @return int|null 実行日時
	 */
	public function getTryAt(): ?int {
		return $this->tryAt;
	}

	/**
	 * 実行日時を設定
	 *
	 * @param int|null $tryAt 実行日時
	 */
	public function setTryAt(?int $tryAt) {
		$this->tryAt = $tryAt;
	}

	/**
	 * 実行日時を設定
	 *
	 * @param int|null $tryAt 実行日時
	 * @return JobResultBody $this
	 */
	public function withTryAt(?int $tryAt): JobResultBody {
		$this->tryAt = $tryAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "tryNumber" => $this->tryNumber,
            "statusCode" => $this->statusCode,
            "result" => $this->result,
            "tryAt" => $this->tryAt,
        );
    }

    public static function fromJson(array $data): JobResultBody {
        $model = new JobResultBody();
        $model->setTryNumber(isset($data["tryNumber"]) ? $data["tryNumber"] : null);
        $model->setStatusCode(isset($data["statusCode"]) ? $data["statusCode"] : null);
        $model->setResult(isset($data["result"]) ? $data["result"] : null);
        $model->setTryAt(isset($data["tryAt"]) ? $data["tryAt"] : null);
        return $model;
    }
}