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

namespace Gs2\Mission\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Mission\Model\CounterScopeModel;

/**
 * カウンターの種類マスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateCounterModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null カウンターの種類マスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName カウンターの種類マスターを新規作成
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName カウンターの種類マスターを新規作成
     * @return CreateCounterModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): CreateCounterModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string カウンター名 */
    private $name;

    /**
     * カウンター名を取得
     *
     * @return string|null カウンターの種類マスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * カウンター名を設定
     *
     * @param string $name カウンターの種類マスターを新規作成
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * カウンター名を設定
     *
     * @param string $name カウンターの種類マスターを新規作成
     * @return CreateCounterModelMasterRequest $this
     */
    public function withName(string $name = null): CreateCounterModelMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string メタデータ */
    private $metadata;

    /**
     * メタデータを取得
     *
     * @return string|null カウンターの種類マスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * メタデータを設定
     *
     * @param string $metadata カウンターの種類マスターを新規作成
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * メタデータを設定
     *
     * @param string $metadata カウンターの種類マスターを新規作成
     * @return CreateCounterModelMasterRequest $this
     */
    public function withMetadata(string $metadata = null): CreateCounterModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string カウンターの種類マスターの説明 */
    private $description;

    /**
     * カウンターの種類マスターの説明を取得
     *
     * @return string|null カウンターの種類マスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * カウンターの種類マスターの説明を設定
     *
     * @param string $description カウンターの種類マスターを新規作成
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * カウンターの種類マスターの説明を設定
     *
     * @param string $description カウンターの種類マスターを新規作成
     * @return CreateCounterModelMasterRequest $this
     */
    public function withDescription(string $description = null): CreateCounterModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var CounterScopeModel[] カウンターのリセットタイミング */
    private $scopes;

    /**
     * カウンターのリセットタイミングを取得
     *
     * @return CounterScopeModel[]|null カウンターの種類マスターを新規作成
     */
    public function getScopes(): ?array {
        return $this->scopes;
    }

    /**
     * カウンターのリセットタイミングを設定
     *
     * @param CounterScopeModel[] $scopes カウンターの種類マスターを新規作成
     */
    public function setScopes(array $scopes = null) {
        $this->scopes = $scopes;
    }

    /**
     * カウンターのリセットタイミングを設定
     *
     * @param CounterScopeModel[] $scopes カウンターの種類マスターを新規作成
     * @return CreateCounterModelMasterRequest $this
     */
    public function withScopes(array $scopes = null): CreateCounterModelMasterRequest {
        $this->setScopes($scopes);
        return $this;
    }

    /** @var string カウントアップ可能な期間を指定するイベントマスター のGRN */
    private $challengePeriodEventId;

    /**
     * カウントアップ可能な期間を指定するイベントマスター のGRNを取得
     *
     * @return string|null カウンターの種類マスターを新規作成
     */
    public function getChallengePeriodEventId(): ?string {
        return $this->challengePeriodEventId;
    }

    /**
     * カウントアップ可能な期間を指定するイベントマスター のGRNを設定
     *
     * @param string $challengePeriodEventId カウンターの種類マスターを新規作成
     */
    public function setChallengePeriodEventId(string $challengePeriodEventId = null) {
        $this->challengePeriodEventId = $challengePeriodEventId;
    }

    /**
     * カウントアップ可能な期間を指定するイベントマスター のGRNを設定
     *
     * @param string $challengePeriodEventId カウンターの種類マスターを新規作成
     * @return CreateCounterModelMasterRequest $this
     */
    public function withChallengePeriodEventId(string $challengePeriodEventId = null): CreateCounterModelMasterRequest {
        $this->setChallengePeriodEventId($challengePeriodEventId);
        return $this;
    }

}