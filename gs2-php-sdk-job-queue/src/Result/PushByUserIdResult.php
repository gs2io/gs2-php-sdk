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

/**
 * ユーザIDを指定してジョブを登録 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class PushByUserIdResult implements IResult {
	/** @var Job[] 追加した{model_name}の一覧 */
	private $items;

	/**
	 * 追加した{model_name}の一覧を取得
	 *
	 * @return Job[]|null ユーザIDを指定してジョブを登録
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * 追加した{model_name}の一覧を設定
	 *
	 * @param Job[]|null $items ユーザIDを指定してジョブを登録
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    public static function fromJson(array $data): PushByUserIdResult {
        $result = new PushByUserIdResult();
        $result->setItems(array_map(
                function ($v) {
                    return Job::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        return $result;
    }
}