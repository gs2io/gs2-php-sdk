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
use Gs2\Enhance\Model\LogSetting;

/**
 * ネームスペースを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateNamespaceRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $name;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $name ネームスペースを新規作成
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $name ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withName(string $name = null): CreateNamespaceRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string ネームスペースの説明 */
    private $description;

    /**
     * ネームスペースの説明を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを新規作成
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withDescription(string $description = null): CreateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var bool DirectEnhance を利用できるようにするか */
    private $enableDirectEnhance;

    /**
     * DirectEnhance を利用できるようにするかを取得
     *
     * @return bool|null ネームスペースを新規作成
     */
    public function getEnableDirectEnhance(): ?bool {
        return $this->enableDirectEnhance;
    }

    /**
     * DirectEnhance を利用できるようにするかを設定
     *
     * @param bool $enableDirectEnhance ネームスペースを新規作成
     */
    public function setEnableDirectEnhance(bool $enableDirectEnhance = null) {
        $this->enableDirectEnhance = $enableDirectEnhance;
    }

    /**
     * DirectEnhance を利用できるようにするかを設定
     *
     * @param bool $enableDirectEnhance ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withEnableDirectEnhance(bool $enableDirectEnhance = null): CreateNamespaceRequest {
        $this->setEnableDirectEnhance($enableDirectEnhance);
        return $this;
    }

    /** @var string 交換処理をジョブとして追加するキューのネームスペース のGRN */
    private $queueNamespaceId;

    /**
     * 交換処理をジョブとして追加するキューのネームスペース のGRNを取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getQueueNamespaceId(): ?string {
        return $this->queueNamespaceId;
    }

    /**
     * 交換処理をジョブとして追加するキューのネームスペース のGRNを設定
     *
     * @param string $queueNamespaceId ネームスペースを新規作成
     */
    public function setQueueNamespaceId(string $queueNamespaceId = null) {
        $this->queueNamespaceId = $queueNamespaceId;
    }

    /**
     * 交換処理をジョブとして追加するキューのネームスペース のGRNを設定
     *
     * @param string $queueNamespaceId ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withQueueNamespaceId(string $queueNamespaceId = null): CreateNamespaceRequest {
        $this->setQueueNamespaceId($queueNamespaceId);
        return $this;
    }

    /** @var string 交換処理のスタンプシートで使用する暗号鍵GRN */
    private $keyId;

    /**
     * 交換処理のスタンプシートで使用する暗号鍵GRNを取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * 交換処理のスタンプシートで使用する暗号鍵GRNを設定
     *
     * @param string $keyId ネームスペースを新規作成
     */
    public function setKeyId(string $keyId = null) {
        $this->keyId = $keyId;
    }

    /**
     * 交換処理のスタンプシートで使用する暗号鍵GRNを設定
     *
     * @param string $keyId ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withKeyId(string $keyId = null): CreateNamespaceRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var LogSetting ログの出力設定 */
    private $logSetting;

    /**
     * ログの出力設定を取得
     *
     * @return LogSetting|null ネームスペースを新規作成
     */
    public function getLogSetting(): ?LogSetting {
        return $this->logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを新規作成
     */
    public function setLogSetting(LogSetting $logSetting = null) {
        $this->logSetting = $logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withLogSetting(LogSetting $logSetting = null): CreateNamespaceRequest {
        $this->setLogSetting($logSetting);
        return $this;
    }

}