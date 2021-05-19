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
use Gs2\Enhance\Model\Config;

/**
 * ユーザIDを指定して強化を実行 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DirectEnhanceByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザIDを指定して強化を実行
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定して強化を実行
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定して強化を実行
     * @return DirectEnhanceByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): DirectEnhanceByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 強化レート名 */
    private $rateName;

    /**
     * 強化レート名を取得
     *
     * @return string|null ユーザIDを指定して強化を実行
     */
    public function getRateName(): ?string {
        return $this->rateName;
    }

    /**
     * 強化レート名を設定
     *
     * @param string $rateName ユーザIDを指定して強化を実行
     */
    public function setRateName(string $rateName = null) {
        $this->rateName = $rateName;
    }

    /**
     * 強化レート名を設定
     *
     * @param string $rateName ユーザIDを指定して強化を実行
     * @return DirectEnhanceByUserIdRequest $this
     */
    public function withRateName(string $rateName = null): DirectEnhanceByUserIdRequest {
        $this->setRateName($rateName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザIDを指定して強化を実行
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定して強化を実行
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定して強化を実行
     * @return DirectEnhanceByUserIdRequest $this
     */
    public function withUserId(string $userId = null): DirectEnhanceByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string 強化対象の GS2-Inventory アイテムセットGRN */
    private $targetItemSetId;

    /**
     * 強化対象の GS2-Inventory アイテムセットGRNを取得
     *
     * @return string|null ユーザIDを指定して強化を実行
     */
    public function getTargetItemSetId(): ?string {
        return $this->targetItemSetId;
    }

    /**
     * 強化対象の GS2-Inventory アイテムセットGRNを設定
     *
     * @param string $targetItemSetId ユーザIDを指定して強化を実行
     */
    public function setTargetItemSetId(string $targetItemSetId = null) {
        $this->targetItemSetId = $targetItemSetId;
    }

    /**
     * 強化対象の GS2-Inventory アイテムセットGRNを設定
     *
     * @param string $targetItemSetId ユーザIDを指定して強化を実行
     * @return DirectEnhanceByUserIdRequest $this
     */
    public function withTargetItemSetId(string $targetItemSetId = null): DirectEnhanceByUserIdRequest {
        $this->setTargetItemSetId($targetItemSetId);
        return $this;
    }

    /** @var Material[] 強化素材リスト */
    private $materials;

    /**
     * 強化素材リストを取得
     *
     * @return Material[]|null ユーザIDを指定して強化を実行
     */
    public function getMaterials(): ?array {
        return $this->materials;
    }

    /**
     * 強化素材リストを設定
     *
     * @param Material[] $materials ユーザIDを指定して強化を実行
     */
    public function setMaterials(array $materials = null) {
        $this->materials = $materials;
    }

    /**
     * 強化素材リストを設定
     *
     * @param Material[] $materials ユーザIDを指定して強化を実行
     * @return DirectEnhanceByUserIdRequest $this
     */
    public function withMaterials(array $materials = null): DirectEnhanceByUserIdRequest {
        $this->setMaterials($materials);
        return $this;
    }

    /** @var Config[] 設定値 */
    private $config;

    /**
     * 設定値を取得
     *
     * @return Config[]|null ユーザIDを指定して強化を実行
     */
    public function getConfig(): ?array {
        return $this->config;
    }

    /**
     * 設定値を設定
     *
     * @param Config[] $config ユーザIDを指定して強化を実行
     */
    public function setConfig(array $config = null) {
        $this->config = $config;
    }

    /**
     * 設定値を設定
     *
     * @param Config[] $config ユーザIDを指定して強化を実行
     * @return DirectEnhanceByUserIdRequest $this
     */
    public function withConfig(array $config = null): DirectEnhanceByUserIdRequest {
        $this->setConfig($config);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDを指定して強化を実行
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定して強化を実行
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定して強化を実行
     * @return DirectEnhanceByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): DirectEnhanceByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}