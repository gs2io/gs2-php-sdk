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

namespace Gs2\Identifier\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * ユーザを更新します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateUserRequest extends Gs2BasicRequest {

    /** @var string ユーザー名 */
    private $userName;

    /**
     * ユーザー名を取得
     *
     * @return string|null ユーザを更新します
     */
    public function getUserName(): ?string {
        return $this->userName;
    }

    /**
     * ユーザー名を設定
     *
     * @param string $userName ユーザを更新します
     */
    public function setUserName(string $userName) {
        $this->userName = $userName;
    }

    /**
     * ユーザー名を設定
     *
     * @param string $userName ユーザを更新します
     * @return UpdateUserRequest $this
     */
    public function withUserName(string $userName): UpdateUserRequest {
        $this->setUserName($userName);
        return $this;
    }

    /** @var string ユーザの説明 */
    private $description;

    /**
     * ユーザの説明を取得
     *
     * @return string|null ユーザを更新します
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ユーザの説明を設定
     *
     * @param string $description ユーザを更新します
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * ユーザの説明を設定
     *
     * @param string $description ユーザを更新します
     * @return UpdateUserRequest $this
     */
    public function withDescription(string $description): UpdateUserRequest {
        $this->setDescription($description);
        return $this;
    }

}