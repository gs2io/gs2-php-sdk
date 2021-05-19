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

namespace Gs2\Enhance\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Enhance\Model\Material;

/**
 * ユーザIDを指定して強化実行を作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateProgressByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザIDを指定して強化実行を作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定して強化実行を作成
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定して強化実行を作成
     * @return CreateProgressByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): CreateProgressByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザIDを指定して強化実行を作成
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定して強化実行を作成
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定して強化実行を作成
     * @return CreateProgressByUserIdRequest $this
     */
    public function withUserId(string $userId = null): CreateProgressByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string 強化レート名 */
    private $rateName;

    /**
     * 強化レート名を取得
     *
     * @return string|null ユーザIDを指定して強化実行を作成
     */
    public function getRateName(): ?string {
        return $this->rateName;
    }

    /**
     * 強化レート名を設定
     *
     * @param string $rateName ユーザIDを指定して強化実行を作成
     */
    public function setRateName(string $rateName = null) {
        $this->rateName = $rateName;
    }

    /**
     * 強化レート名を設定
     *
     * @param string $rateName ユーザIDを指定して強化実行を作成
     * @return CreateProgressByUserIdRequest $this
     */
    public function withRateName(string $rateName = null): CreateProgressByUserIdRequest {
        $this->setRateName($rateName);
        return $this;
    }

    /** @var string 強化対象の GS2-Inventory アイテムセットGRN */
    private $targetItemSetId;

    /**
     * 強化対象の GS2-Inventory アイテムセットGRNを取得
     *
     * @return string|null ユーザIDを指定して強化実行を作成
     */
    public function getTargetItemSetId(): ?string {
        return $this->targetItemSetId;
    }

    /**
     * 強化対象の GS2-Inventory アイテムセットGRNを設定
     *
     * @param string $targetItemSetId ユーザIDを指定して強化実行を作成
     */
    public function setTargetItemSetId(string $targetItemSetId = null) {
        $this->targetItemSetId = $targetItemSetId;
    }

    /**
     * 強化対象の GS2-Inventory アイテムセットGRNを設定
     *
     * @param string $targetItemSetId ユーザIDを指定して強化実行を作成
     * @return CreateProgressByUserIdRequest $this
     */
    public function withTargetItemSetId(string $targetItemSetId = null): CreateProgressByUserIdRequest {
        $this->setTargetItemSetId($targetItemSetId);
        return $this;
    }

    /** @var Material[] 強化素材リスト */
    private $materials;

    /**
     * 強化素材リストを取得
     *
     * @return Material[]|null ユーザIDを指定して強化実行を作成
     */
    public function getMaterials(): ?array {
        return $this->materials;
    }

    /**
     * 強化素材リストを設定
     *
     * @param Material[] $materials ユーザIDを指定して強化実行を作成
     */
    public function setMaterials(array $materials = null) {
        $this->materials = $materials;
    }

    /**
     * 強化素材リストを設定
     *
     * @param Material[] $materials ユーザIDを指定して強化実行を作成
     * @return CreateProgressByUserIdRequest $this
     */
    public function withMaterials(array $materials = null): CreateProgressByUserIdRequest {
        $this->setMaterials($materials);
        return $this;
    }

    /** @var bool すでに開始している強化がある場合にそれを破棄して開始するか */
    private $force;

    /**
     * すでに開始している強化がある場合にそれを破棄して開始するかを取得
     *
     * @return bool|null ユーザIDを指定して強化実行を作成
     */
    public function getForce(): ?bool {
        return $this->force;
    }

    /**
     * すでに開始している強化がある場合にそれを破棄して開始するかを設定
     *
     * @param bool $force ユーザIDを指定して強化実行を作成
     */
    public function setForce(bool $force = null) {
        $this->force = $force;
    }

    /**
     * すでに開始している強化がある場合にそれを破棄して開始するかを設定
     *
     * @param bool $force ユーザIDを指定して強化実行を作成
     * @return CreateProgressByUserIdRequest $this
     */
    public function withForce(bool $force = null): CreateProgressByUserIdRequest {
        $this->setForce($force);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDを指定して強化実行を作成
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定して強化実行を作成
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定して強化実行を作成
     * @return CreateProgressByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): CreateProgressByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}