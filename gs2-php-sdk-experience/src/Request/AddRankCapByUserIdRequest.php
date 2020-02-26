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

namespace Gs2\Experience\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * ランクキャップを加算 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class AddRankCapByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ランクキャップを加算
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ランクキャップを加算
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ランクキャップを加算
     * @return AddRankCapByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): AddRankCapByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ランクキャップを加算
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ランクキャップを加算
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ランクキャップを加算
     * @return AddRankCapByUserIdRequest $this
     */
    public function withUserId(string $userId): AddRankCapByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string 経験値の種類の名前 */
    private $experienceName;

    /**
     * 経験値の種類の名前を取得
     *
     * @return string|null ランクキャップを加算
     */
    public function getExperienceName(): ?string {
        return $this->experienceName;
    }

    /**
     * 経験値の種類の名前を設定
     *
     * @param string $experienceName ランクキャップを加算
     */
    public function setExperienceName(string $experienceName) {
        $this->experienceName = $experienceName;
    }

    /**
     * 経験値の種類の名前を設定
     *
     * @param string $experienceName ランクキャップを加算
     * @return AddRankCapByUserIdRequest $this
     */
    public function withExperienceName(string $experienceName): AddRankCapByUserIdRequest {
        $this->setExperienceName($experienceName);
        return $this;
    }

    /** @var string プロパティID */
    private $propertyId;

    /**
     * プロパティIDを取得
     *
     * @return string|null ランクキャップを加算
     */
    public function getPropertyId(): ?string {
        return $this->propertyId;
    }

    /**
     * プロパティIDを設定
     *
     * @param string $propertyId ランクキャップを加算
     */
    public function setPropertyId(string $propertyId) {
        $this->propertyId = $propertyId;
    }

    /**
     * プロパティIDを設定
     *
     * @param string $propertyId ランクキャップを加算
     * @return AddRankCapByUserIdRequest $this
     */
    public function withPropertyId(string $propertyId): AddRankCapByUserIdRequest {
        $this->setPropertyId($propertyId);
        return $this;
    }

    /** @var int 加算するランクキャップ量 */
    private $rankCapValue;

    /**
     * 加算するランクキャップ量を取得
     *
     * @return int|null ランクキャップを加算
     */
    public function getRankCapValue(): ?int {
        return $this->rankCapValue;
    }

    /**
     * 加算するランクキャップ量を設定
     *
     * @param int $rankCapValue ランクキャップを加算
     */
    public function setRankCapValue(int $rankCapValue) {
        $this->rankCapValue = $rankCapValue;
    }

    /**
     * 加算するランクキャップ量を設定
     *
     * @param int $rankCapValue ランクキャップを加算
     * @return AddRankCapByUserIdRequest $this
     */
    public function withRankCapValue(int $rankCapValue): AddRankCapByUserIdRequest {
        $this->setRankCapValue($rankCapValue);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ランクキャップを加算
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ランクキャップを加算
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ランクキャップを加算
     * @return AddRankCapByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): AddRankCapByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}