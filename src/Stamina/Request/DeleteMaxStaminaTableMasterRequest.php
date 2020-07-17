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

namespace Gs2\Stamina\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * スタミナの最大値テーブルマスターを削除 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteMaxStaminaTableMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null スタミナの最大値テーブルマスターを削除
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタミナの最大値テーブルマスターを削除
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタミナの最大値テーブルマスターを削除
     * @return DeleteMaxStaminaTableMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): DeleteMaxStaminaTableMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 最大スタミナ値テーブル名 */
    private $maxStaminaTableName;

    /**
     * 最大スタミナ値テーブル名を取得
     *
     * @return string|null スタミナの最大値テーブルマスターを削除
     */
    public function getMaxStaminaTableName(): ?string {
        return $this->maxStaminaTableName;
    }

    /**
     * 最大スタミナ値テーブル名を設定
     *
     * @param string $maxStaminaTableName スタミナの最大値テーブルマスターを削除
     */
    public function setMaxStaminaTableName(string $maxStaminaTableName = null) {
        $this->maxStaminaTableName = $maxStaminaTableName;
    }

    /**
     * 最大スタミナ値テーブル名を設定
     *
     * @param string $maxStaminaTableName スタミナの最大値テーブルマスターを削除
     * @return DeleteMaxStaminaTableMasterRequest $this
     */
    public function withMaxStaminaTableName(string $maxStaminaTableName = null): DeleteMaxStaminaTableMasterRequest {
        $this->setMaxStaminaTableName($maxStaminaTableName);
        return $this;
    }

}