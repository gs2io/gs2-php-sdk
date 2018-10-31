<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\InGamePushNotification\Model;

/**
 * MQTT over WebSocketサーバ
 *
 * @author Game Server Services, Inc.
 *
 */
class WebSocketHost {

	/** @var string ゲームGRN */
	private $gameId;

	/** @var string エンドポイント名 */
	private $endpoint;

	/** @var string ルート証明書 */
	private $rootCertificate;

	/**
	 * ゲームGRNを取得
	 *
	 * @return string ゲームGRN
	 */
	public function getGameId() {
		return $this->gameId;
	}

	/**
	 * ゲームGRNを設定
	 *
	 * @param string $gameId ゲームGRN
	 */
	public function setGameId($gameId) {
		$this->gameId = $gameId;
	}

	/**
	 * ゲームGRNを設定
	 *
	 * @param string $gameId ゲームGRN
	 * @return self
	 */
	public function withGameId($gameId): self {
		$this->setGameId($gameId);
		return $this;
	}

	/**
	 * エンドポイント名を取得
	 *
	 * @return string エンドポイント名
	 */
	public function getEndpoint() {
		return $this->endpoint;
	}

	/**
	 * エンドポイント名を設定
	 *
	 * @param string $endpoint エンドポイント名
	 */
	public function setEndpoint($endpoint) {
		$this->endpoint = $endpoint;
	}

	/**
	 * エンドポイント名を設定
	 *
	 * @param string $endpoint エンドポイント名
	 * @return self
	 */
	public function withEndpoint($endpoint): self {
		$this->setEndpoint($endpoint);
		return $this;
	}

	/**
	 * ルート証明書を取得
	 *
	 * @return string ルート証明書
	 */
	public function getRootCertificate() {
		return $this->rootCertificate;
	}

	/**
	 * ルート証明書を設定
	 *
	 * @param string $rootCertificate ルート証明書
	 */
	public function setRootCertificate($rootCertificate) {
		$this->rootCertificate = $rootCertificate;
	}

	/**
	 * ルート証明書を設定
	 *
	 * @param string $rootCertificate ルート証明書
	 * @return self
	 */
	public function withRootCertificate($rootCertificate): self {
		$this->setRootCertificate($rootCertificate);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return WebSocketHost
	 */
    static function build(array $array)
    {
        $item = new WebSocketHost();
        $item->setGameId(isset($array['gameId']) ? $array['gameId'] : null);
        $item->setEndpoint(isset($array['endpoint']) ? $array['endpoint'] : null);
        $item->setRootCertificate(isset($array['rootCertificate']) ? $array['rootCertificate'] : null);
        return $item;
    }

}