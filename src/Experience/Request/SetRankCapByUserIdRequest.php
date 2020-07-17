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
 * ランクキャップを設定 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class SetRankCapByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ランクキャップを設定
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ランクキャップを設定
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ランクキャップを設定
     * @return SetRankCapByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): SetRankCapByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ランクキャップを設定
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ランクキャップを設定
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ランクキャップを設定
     * @return SetRankCapByUserIdRequest $this
     */
    public function withUserId(string $userId = null): SetRankCapByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string 経験値の種類の名前 */
    private $experienceName;

    /**
     * 経験値の種類の名前を取得
     *
     * @return string|null ランクキャップを設定
     */
    public function getExperienceName(): ?string {
        return $this->experienceName;
    }

    /**
     * 経験値の種類の名前を設定
     *
     * @param string $experienceName ランクキャップを設定
     */
    public function setExperienceName(string $experienceName = null) {
        $this->experienceName = $experienceName;
    }

    /**
     * 経験値の種類の名前を設定
     *
     * @param string $experienceName ランクキャップを設定
     * @return SetRankCapByUserIdRequest $this
     */
    public function withExperienceName(string $experienceName = null): SetRankCapByUserIdRequest {
        $this->setExperienceName($experienceName);
        return $this;
    }

    /** @var string プロパティID */
    private $propertyId;

    /**
     * プロパティIDを取得
     *
     * @return string|null ランクキャップを設定
     */
    public function getPropertyId(): ?string {
        return $this->propertyId;
    }

    /**
     * プロパティIDを設定
     *
     * @param string $propertyId ランクキャップを設定
     */
    public function setPropertyId(string $propertyId = null) {
        $this->propertyId = $propertyId;
    }

    /**
     * プロパティIDを設定
     *
     * @param string $propertyId ランクキャップを設定
     * @return SetRankCapByUserIdRequest $this
     */
    public function withPropertyId(string $propertyId = null): SetRankCapByUserIdRequest {
        $this->setPropertyId($propertyId);
        return $this;
    }

    /** @var int ランクキャップ */
    private $rankCapValue;

    /**
     * ランクキャップを取得
     *
     * @return int|null ランクキャップを設定
     */
    public function getRankCapValue(): ?int {
        return $this->rankCapValue;
    }

    /**
     * ランクキャップを設定
     *
     * @param int $rankCapValue ランクキャップを設定
     */
    public function setRankCapValue(int $rankCapValue = null) {
        $this->rankCapValue = $rankCapValue;
    }

    /**
     * ランクキャップを設定
     *
     * @param int $rankCapValue ランクキャップを設定
     * @return SetRankCapByUserIdRequest $this
     */
    public function withRankCapValue(int $rankCapValue = null): SetRankCapByUserIdRequest {
        $this->setRankCapValue($rankCapValue);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ランクキャップを設定
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ランクキャップを設定
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ランクキャップを設定
     * @return SetRankCapByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): SetRankCapByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}